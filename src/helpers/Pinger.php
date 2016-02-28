<?php
namespace Bonweb\Laradmin;

/**
 * Class Pinger.
 */
class Pinger
{
    /**
     * Create new instance of Pinger class.
     */
    public function __construct()
    {
    }

    public function pingYandex($title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing('http://ping.blogs.yandex.ru', $xml);
    }

    public function pingGoogle($title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing('http://blogsearch.google.com/ping/RPC2', $xml);
    }

    public function pingYahoo($title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing('http://api.my.yahoo.com/RPC2', $xml);
    }

    public function pingFeedburner($title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing('http://ping.feedburner.com', $xml);
    }

    public function pingWeblogs($title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing('http://ping.weblogs.se/', $xml);
    }

    public function pingPingOMatic($title, $url, $rss = null, $params = [])
    {
        $entity = [
            'chk_weblogscom' => 'on',
            'chk_blogs' => 'on',
            'chk_feedburner' => 'on',
            'chk_newsgator' => 'on',
            'chk_myyahoo' => 'on',
            'chk_pubsubcom' => 'on',
            'chk_blogdigger' => 'on',
            'chk_weblogalot' => 'on',
            'chk_newsisfree' => 'on',
            'chk_topicexchange' => 'on',
            'chk_google' => 'on',
            'chk_tailrank' => 'on',
            'chk_skygrid' => 'on',
            'chk_collecta' => 'on',
            'chk_superfeedr' => 'on',
        ];
        $entity['title'] = urlencode($title);
        $entity['blogurl'] = urlencode($url);
        $entity['rssurl'] = urlencode($rss);
        $query_string = http_build_query(array_merge($entity, $params));
        $service_url = 'http://pingomatic.com/ping/?' . $query_string;
        return $this->sendPing($service_url, $query_string);
    }

    public function ping($service_url, $title, $url, $rss = null)
    {
        $xml = $this->getXml($title, $url, $rss);
        return $this->sendPing($service_url, $xml);
    }

    public function pingAll($title, $url, $rss = null)
    {
        $this->pingGoogle($title, $url, $rss);
        $this->pingYahoo($title, $url, $rss);
        $this->pingFeedburner($title, $url, $rss);
        $this->pingYandex($title, $url, $rss);
        $this->pingWeblogs($title, $url, $rss);
        $this->pingPingOMatic($title, $url, $rss);
        return true;
    }

    private function getXml($title, $url, $rss = null)
    {
        $data = [
            'title' => $title,
            'url' => $url,
        ];
        if (!empty($rss)) {
            $data['rss'] = $rss;
            $rss = "<param>
                <value>{$rss}</value>
            </param>";
        }

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<methodCall>
    <methodName>weblogUpdates.ping</methodName>
    <params>
        <param>
            <value>{$title}</value>
        </param>
        <param>
            <value>{$url}</value>
        </param>
        {{ $rss }}
    </params>
</methodCall>";

        return $xml;
    }

    private function sendPing($url, $post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}