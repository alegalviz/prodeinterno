<?php

class PostController extends BaseController {

    /**
     * Post Model
     * @var Post
     */
    protected $post;

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param Post $post
     * @param User $user
     */
    public function __construct(Post $post, User $user)
    {
        parent::__construct();

        $this->post = $post;
        $this->user = $user;
    }
    
	/**
	 * Returns all the blog posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
        //para el descontador
        $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();

        // Get all the blog posts
		$posts = $this->post->orderBy('created_at', 'desc')->with('comments', 'likes')->paginate(10);

        //dd($posts->first());
		// Show the page
		return View::make('site/cartelera', compact('posts', 'tiempoparaveda'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $tiempoparaveda = Partido::where('inicio', '>', Carbon::now())->orderBy('inicio')->get(array('inicio'))->first();

        // Title
        $title = Lang::get('admin/posts/title.create_a_new_post');

        // Show the page
        return View::make('site/posts/create_edit', compact('title','tiempoparaveda'));
    }

	/**
	 * View a post.
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function postCreate()
	{
		// Declare the rules for the form validation
		$rules = array(
            //'title' => 'required|min:3',
			'content' => 'required|min:3|max:255'
		);

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success
		if ($validator->passes())
		{
			// Save the comment
			$post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = Input::get('title');
            $post->content = Input::get('content');

			// Was the comment saved with success?
			if($post->save())
			{
				// Redirect to this blog post page
				return Redirect::to('cartelera')->with('success', 'Your post was added with success.');
			}

			// Redirect to this blog post page
			return Redirect::to('cartelera')->with('error', 'There was a problem adding your post, please try again.');
		}

		// Redirect to this blog post page
		return Redirect::to('cartelera')->withInput()->withErrors($validator);
	}

    /**
     * Post a comment.
     *
     * @param  post id
     * @return comment string
     */
    public function postComment($postid)
    {
        // Declare the rules for the form validation
        $rules = array(
            'comment' => 'required|max:140'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Save the comment
            $comment = new Comment;
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $postid;
            $comment->content = Input::get('comment');

            // Was the comment saved with success?
            if($comment->save())
            {
                // Redirect to this blog post page
                return $comment->content;
            }

            // Redirect to this blog post page
            return ('There was a problem adding your post, please try again.');
        }

        // Redirect to this blog post page
        return ('There was a problem adding your post, please try again. Max: 140 characters');
    }
    /**
     * Like a post.
     *
     * @param  post id
     * @return true
     */
    public function postLike($postid)
    {
        // validar si el usuario ya le puso me gusta
        // Save the comment
        if(Like::where('user_id', '=', Auth::user()->id)->where('post_id', '=', $postid)->count() == 0) {

            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->post_id = $postid;
            // Was the comment saved with success?
            if($like->save())
            {
                // Redirect to this blog post page
                return ('success');
            }
        }



        // Redirect to this blog post page
        return ('Error');
    }
}
