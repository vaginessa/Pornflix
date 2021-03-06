<?php

class Header {
	private $mysql;

	function __construct($mysql) {
		$this->mysql = $mysql;
	}

	public function generate() {
		$query = (isset($_GET['query']) ? $_GET['query'] : ""); 

		$content = "\t\t<div class=\"header\">\n";
		$content .= "\t\t\t<a href=\"/\" class=\"logo-link\">\n";
		$content .= "\t\t\t\t<div class=\"header-logo\">" . Constants::getSiteName() . "</div>\n";
		$content .= "\t\t\t</a>\n";
		
		$content .= "\t\t\t<ul class=\"menu\">\n";
		$content .= "\t\t\t\t<a class=\"menu-item-link\">\n";
		$content .= "\t\t\t\t\t<li class=\"menu-item\">Categories</li>\n";
		$content .= "\t\t\t\t</a>\n";
		$content .= "\t\t\t\t<a class=\"menu-item-link\">\n";
		$content .= "\t\t\t\t\t<li class=\"menu-item\">Actors</li>\n";
		$content .= "\t\t\t\t</a>\n";
		$content .= "\t\t\t\t<a class=\"menu-item-link\" href=\"?view=upload\">\n";
		$content .= "\t\t\t\t\t<li class=\"menu-item\">Upload</li>\n";
		$content .= "\t\t\t\t</a>\n";
		$content .= "\t\t\t</ul>\n";

		$content .= "\t\t\t<div class=\"user-menu\">\n";
		$content .= "\t\t\t\t<div class=\"profile\">\n";
		$content .= "\t\t\t\t\t<span class=\"profile-picture\"></span>\n";
		$content .= "\t\t\t\t\t<span class=\"profile-name\">" . (new QCommon($this->mysql))->getUsername($_SESSION['user']) . "</span>\n";
		$content .= "\t\t\t\t</div>\n";
		$content .= "\t\t\t\t<ul class=\"dropdown\">\n";
		$content .= "\t\t\t\t\t<li class=\"dropdown-item\"><a href=\"?view=account\">Manage Account</a></li>\n";
		$content .= "\t\t\t\t\t<li class=\"dropdown-item\">\n";
		$content .= "\t\t\t\t\t\t<form action=\"/\" name=\"logoff\" method=\"post\">\n";
		$content .= "\t\t\t\t\t\t\t<input type=\"hidden\" name=\"command\" value=\"logoff\">\n";
		$content .= "\t\t\t\t\t\t\t<button class=\"logoff\" type=\"submit\">Sign Out</button>\n";
		$content .= "\t\t\t\t\t\t</form>\n";
		$content .= "\t\t\t\t\t</li>\n";
		$content .= "\t\t\t\t</ul>\n";
		$content .= "\t\t\t</div>\n";
		
		$content .= "\t\t\t<div class=\"search\">\n";
		$content .= "\t\t\t\t<form class=\"search-form\" method=\"post\" action=\"" . htmlspecialchars("?view=search&query=") . "\" onsubmit=\"Helper.submitSearch()\">\n";
		$content .= "\t\t\t\t\t<input class=\"search-bar\" placeholder=\"Search\" value=\"$query\">\n";
		$content .= "\t\t\t\t\t<i class=\"fa fa-search search-icon\" aria-hidden=\"true\"></i>\n";
		$content .= "\t\t\t\t</form>\n";
		$content .= "\t\t\t</div>\n";
		$content .= "\t\t</div>\n";
		
		return $content;
	}
}

?>
