<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TeamController extends Controller {

    public function list(){
        $offset = 0;
        if(isset($_GET['pg']) && $_GET['pg']){
            $offset = ($_GET['pg'] - 1) * 12;
        }

        $team = DB::table('p_team')->where('deleted', false);

        if(isset($_GET['name']) && $_GET['name']){
            $team = $team->where('name', 'like', '%'.$_GET['name'].'%');
        }

        if(isset($_GET['profession']) && $_GET['profession']){
            $team = $team->where('profession', 'like', '%'.$_GET['profession'].'%');
        }

        if(isset($_GET['date']) && $_GET['date']){
            $date1 = date('Y-m-d 00:00:00', strtotime($_GET['date']));
            $date2 = date('Y-m-d 23:59:59', strtotime($_GET['date']));
            $team = $team->whereBetween('create_date', [$date1, $date2]);
        }

        if (isset($_GET['sort']) && $_GET['sort']) {
            $team = $team->orderBy($_GET['sort'], $_GET['order']);
        }

        if(isset($_GET['export']) && $_GET['export']){
            $content = array(array(__('panel.controller.team.name-surnmae'), __('panel.controller.team.mission'), __('panel.controller.team.content'), __('panel.controller.team.constituent'), __('panel.controller.team.created-date')));
            foreach($team->get() as $row){
                $content[] = array(
                    $row->name ? $row->name : '-',
                    $row->profession ? $row->profession : '-',
                    $row->content ? $row->content : '-',
                    $row->created_by == -1 ? 'Argenova' : DB::table('p_users')->where('id', $row->created_by)->first()->name,
                    date("d.m.Y H:i", strtotime($row->create_date)),
                );
            }
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray($content, NULL, 'A1');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment; filename=\"".__('panel.controller.team.report').".xlsx\"");
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            die;
        } else {
            return view('panel.team.list', [
                'allTeam' => $team->get(),
                'team' => $team->offset($offset)->limit(12)->get()
            ]);
        }
    }

    public function add(){
        return view('panel.team.add');
    }

    public function edit($id){
        $item = DB::table('p_team')->where(['id' => $id, 'deleted' => false])->first();
        $keywordStr = "";
        if(isset($item->keywords)){
            foreach(json_decode($item->keywords, true) as $keyword){
                $keywordStr .= $keyword['value'].',';
            }
        }
        return view('panel.team.edit', [
            'item' => $item,
            'keywords' => $keywordStr
        ]);
    }

    public function action(Request $request){
        try {
            if($request->type == "add"){
                DB::table('p_team')->insert([
                    'name' => $request->name,
                    'order_id' => $request->orderId,
                    'profession' => $request->profession,
                    'seo_title' => $request->seoTitle,
                    'seo_description' => $request->seoDescription,
                    'keywords' => $request->keywords,
                    'content' => $request->content,
                    'created_by' => session('panelUserId'),
                ]);
                DB::table('p_team')->where('id', DB::getPdo()->lastInsertId())->update([
                    'uid' => DB::getPdo()->lastInsertId()
                ]);

                $this->panelLogActivity('panel.controller.team.added-log',$request->name);

                return to_route('panel.team')->with([
                    'title' => __('panel.controller.team.create-success'),
                    'icon' => "success",
                ]);
            } else if($request->type == "edit"){
                DB::table('p_team')->where(['id' => $request->id, 'deleted' => false])->update([
                    'name' => $request->name,
                    'order_id' => $request->orderId,
                    'profession' => $request->profession,
                    'seo_title' => $request->seoTitle,
                    'seo_description' => $request->seoDescription,
                    'keywords' => $request->keywords,
                    'content' => $request->content,
                    'order_id' => $request->orderId
                ]);
                $this->panelLogActivity('panel.controller.team.edited-log',$request->name);
                return back()->with([
                    'title' => __('panel.controller.team.edit-success'),
                    'icon' => "success",
                ])->withInput();
            } else if($request->type == "delete"){
                $entry = DB::table('p_team')->where(['id' => $request->id, 'deleted' => false]);
                $this->panelLogActivity('panel.controller.team.deleted-log',$entry->first()->name);
                $entry->update([
                    'deleted' => true
                ]);

                return response()->json([
                    'title' => __('panel.controller.team.delete-success'),
                    'icon' => "success",
                ]);
            } else {
                return back()->with([
                    'title' => __('panel.controller.team.error-action'),
                    'icon' => "error",
                ]);
            }
        } catch(\Illuminate\Database\QueryException $ex){
            return back()->with([
                'title' => $ex->getMessage(),
                'icon' => "error",
            ])->withInput();
        }
    }
}
