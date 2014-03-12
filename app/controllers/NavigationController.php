<?php

class NavigationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($page)
	{

		 $lang=Request::segment(1)=='ru'?'ru':'et';
		 $menu=Navigation::whereUrl($page)->whereLanguage($lang)->first();
		$meta_description = $menu->menu_name." - ".$menu->article->article;
		$title=($menu->menu_name==$menu->article->article_name)?$menu->article->article_name:$menu->menu_name." - ".$menu->article->article_name;
		
		$meta_desc = Str::limit($meta_description, 153, '...');
		//return View::make('pages', compact('article', 'menu', 'meta_desc','title'));


	//	$menu=Navigation::whereUrl($page)->first();
        
         
        return View::make('pages', compact( 'menu', 'meta_desc','title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('navigations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('navigations.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('navigations.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
