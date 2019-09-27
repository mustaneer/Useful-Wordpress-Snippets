/*
  Filters to change Permalink of posts on archive page. 
*/


foreach( [ 'post', 'page', 'attachment', 'post_type' ] as $type )
{
    add_filter( $type . '_link', function ( $url, $post_id, $sample ) use ( $type )
    {
        return apply_filters( 'wpse_link', $url, $post_id, $sample, $type );
    }, 9999, 3 );
}
add_filter( 'wpse_link', function(  $url, $post_id, $sample, $type )
{
	global $post;
	if (has_category('News',$post_id)){

		 $url = get_post_meta($post->ID, 'feedzy_item_url', true );
	}

	return $url;
}, 10, 4 );
