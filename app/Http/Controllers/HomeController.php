<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct(){
        View::share('FooterMenu', DB::table('p_menu')->where('position','footer')->get());
        View::share('footerLinks', DB::table('p_settings')->where(['id' => 2 , 'deleted' => 0])->first());
    }
    public function index($slug = null)
    {
        if (!$slug) {
            $banner = DB::table('p_slider')->where(['deleted'=> 0])->get();

            return view('home', [
                'banners' => $banner ,
                'blogs' => DB::table('p_blog') -> where('deleted', 0) -> orderBy('order_id','desc')->get(),
                'hizmet' => DB::table('p_service') -> where('deleted',0) -> orderBy('order_id','asc')->get(),
            ]);
        } else {
            $slug_detail = DB::table('p_slug')->where(['name' => $slug, 'deleted' => false])->first();
            if ($slug_detail) {
                $module = DB::table('p_modules')->where('id', $slug_detail->module_id)->first();
                if ($module) {
                    //$find_page = DB::table($module->schema_name)->where(['slug_id' => $slug_detail->id, 'deleted' => false, 'publish' => true])->first();
                    if ($module->name_tr == "Sayfalar") {
                        $page = DB::table($module->schema_name)->where(['slug_id' => $slug_detail->id, 'deleted' => false, 'publish' => true])->first();
                        if (DB::table($module->schema_name)->where(['uid' => $page->id, 'deleted' => false, 'publish' => true])->first()) {
                            $page = DB::table($module->schema_name)->where(['uid' => $page->id, 'deleted' => false, 'publish' => true])->first();
                        }
                        $iletisim = array('iletisim', 'contacts');
                        $hizmetlerimiz = array('hizmetlerimiz', 'services');
                        $hakkimizda = array('hakkimizda', 'about');
                        $blog = array('haber-liste','haber-detay', 'blog', 'blog-details');
                        if (in_array($slug, $iletisim)) {
                            return view("contacts", [
                                'page' => $page,
                                'page_slug' => $slug_detail,
                                'slug' => $slug,
                            ]);
                        }
                        elseif(in_array($slug, $hizmetlerimiz)){
                            return view("services",[
                                'page' => $page,
                                'page_slug' => $slug_detail,
                                'slug' => $slug,
                                'hizmet' => DB::table('p_service') -> where('deleted',0) -> orderBy('order_id','asc')->get(),
                            ]);
                        }
                        elseif(in_array($slug, $hakkimizda)){
                            return view("about", [
                                'page' => $page,
                                'page_slug' => $slug_detail,
                                'slug' => $slug,
                            ]);
                        }
                        elseif(in_array($slug, $blog)){

                                return view("blog-list", [
                                    'page' => $page,
                                    'blogs' => DB::table('p_blog') -> where('deleted', 0) -> orderBy('order_id','asc')->get(),
                                    'page_slug' => $slug_detail,
                                    'slug' => $slug,

                                ]);


                        }
                    }
                    elseif($module->id==1){
                        $blog = DB::table('p_blog')->where(['slug_id' => $slug_detail->id , 'deleted' => false, 'publish' => true])->first();
                    //    $blog_categories =
                       //dd($blog_categories[0]->blogCount);
                        return view("blog-details",[
                            'blog' => $blog,
                            'recent'=> DB::table('p_blog') -> where('deleted', 0) -> orderBy('order_id','desc')->get(),
                            'categories' => DB::table('p_category')
                            ->leftJoin('p_blog', 'p_category.id', '=', 'p_blog.category_id')
                            ->select('p_category.name', DB::raw('COUNT(p_blog.id) AS blog_count'))
                            ->groupBy('p_category.id', 'p_category.name')
                            ->get(),
                        ]);
                    }
                    elseif($module -> id == 9){
                        $hizmet = DB::table('p_service')->where(['slug_id' => $slug_detail->id, 'deleted' => false, 'publish' => true])->first();
                        return view("service-details",[
                            'hizmet' => $hizmet
                        ]);
                    }
                    else {
                        return view('404');
                    }
            }
        }
        else {
            return view('404');
        }
    }
}



}