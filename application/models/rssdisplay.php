<?php
class RSSDisplay extends Model {

    protected $feed_url;
    protected $num_feed_items;

    public function __construct($url){
      parent::__construct();

      $this->feed_url = $url;

    }

    public function getFeedItems($num_feed_items) {
      $this->$num_feed_items = $num_feed_items;
      $itemArray = array();
      $rss = simplexml_load_file($this->feed_url);
      $items = $rss->channel->item;
      for($x=0;$x < $num_feed_items; $x++) {
        $thisItem = $items[$x];
        $thisArray = array($thisItem->title, $thisItem->description, $thisItem->link, $thisItem->pubDate);
        array_push($itemArray, $thisArray);
      }
      return $itemArray;
    }

    public function getChannelInfo() {
      $items = simplexml_load_file($this->feed_url);

      return $items;
    }

}
