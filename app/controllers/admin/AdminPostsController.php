<?php

class AdminPostsController extends AdminController {


    /**
     * Post Model
     * @var Post
     */
    protected $post;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    /**
     * Show a list of all the posts.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/posts/title.post_management');

        // Grab all the posts
        $posts = $this->post;

        // Show the page
        return View::make('admin/posts/index', compact('posts', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        $title = Lang::get('admin/posts/title.create_a_new_post');

        // Show the page
        return View::make('admin/posts/create_edit', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new post
            $user = Auth::user();

            // Update the post data
            $this->post->title          = Input::get('title');
            $this->post->content          = Input::get('content');
            $this->post->user_id          = $user->id;

            // Was the post created?
            if($this->post->save())
            {
                // Redirect to the new post page
                return Redirect::to('admin/posts/' . $this->post->id . '/edit')->with('success', Lang::get('admin/posts/messages.create.success'));
            }

            // Redirect to the post create page
            return Redirect::to('admin/posts/create')->with('error', Lang::get('admin/posts/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/posts/create')->withInput()->withErrors($validator);
	}

    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($post)
	{
        // redirect to the frontend
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($post)
	{
        // Title
        $title = Lang::get('admin/posts/title.post_update');

        // Show the page
        return View::make('admin/posts/create_edit', compact('post', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($post)
	{

        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the post data
            $post->title          = Input::get('title');
            $post->content          = Input::get('content');

            // Was the post updated?
            if($post->save())
            {
                // Redirect to the new post page
                return Redirect::to('admin/posts/' . $post->id . '/edit')->with('success', Lang::get('admin/posts/messages.update.success'));
            }

            // Redirect to the post management page
            return Redirect::to('admin/posts/' . $post->id . '/edit')->with('error', Lang::get('admin/posts/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/posts/' . $post->id . '/edit')->withInput()->withErrors($validator);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function getDelete($post)
    {
        // Title
        $title = Lang::get('admin/posts/title.post_delete');

        // Show the page
        return View::make('admin/posts/delete', compact('post', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete($post)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $post->id;
            $post->delete();

            // Was the post deleted?
            $post = Post::find($id);
            if(empty($post))
            {
                // Redirect to the posts management page
                return Redirect::to('admin/posts')->with('success', Lang::get('admin/posts/messages.delete.success'));
            }
        }
        // There was a problem deleting the post
        return Redirect::to('admin/posts')->with('error', Lang::get('admin/posts/messages.delete.error'));
    }

    /**
     * Show a list of all the posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $posts = Post::select(array('posts.id', 'posts.title', 'posts.content', 'posts.id as comments', 'posts.created_at'));

        return Datatables::of($posts)

        ->edit_column('comments', '{{ DB::table(\'comments\')->where(\'post_id\', \'=\', $id)->count() }}')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/posts/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/posts/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

        ->remove_column('id')

        ->make();
    }

}