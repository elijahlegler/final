<?php

class HomeController extends Controller{

	public function index(){
		$feed = 'http://www.espn.com/espn/rss/news';
		$rss = new RSSDisplay($feed);

		$items = $rss->getFeedItems(8);
		$this->set('item_array', $items);

		$channel_data = $rss->getChannelInfo();
		$channel_title = $channel_data->channel->generator;
		$this->set('rss_title', $channel_title);
	}

}

?>
