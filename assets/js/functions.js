
function get_twitter_data(twitter_username){
	var result = "";

/*
	* UPDATE THIS VARIABLES WITH YOUR TWITTER CREDENTIALS
*/

	var settings = {
		oauth_access_token: 'YOUR ACCESS TOKEN HERE',
		oauth_access_token_secret: 'YOUR SECRET ACCESS TOKEN HERE',
		consumer_key: 'YOUR CONSUMER KEY HERE',
		consumer_secret: 'YOUR CONSUMER SECRET KEY HERE'
		};

	var url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	var getfield = '?screen_name=' + twitter_username + '&count=10';
	url = url + getfield;

// COMMENT THIS LINES TO GET LIVE TWITTER FEED 	
	result = JSON.parse(testResponse);
	return result;
// END OF COMMENTABLE CODE 
	
/*	
	* UNCOMMENT THIS CODE IN ORDER TO GET TWITTER FEED AVAILABLE
	$.ajax({
		type: 'POST',
		url: url,
		dataType: 'application/javascript',
		data: settings,
		success: function(data) {
			result = JSON.parse(data);
		} 
	});
	return result;

	* END OF TWITTER FEED CODE
*/	
}

function populate_feed(twitter_feed = undefined){
	var twit_content = "";
	if(twitter_feed == undefined){
		$('#twitter_feed_container').html('Twitter feed unavailable');
	}
	else{
		for(i = 0; i < twitter_feed.length; i++){
			twit_id = twitter_feed[i].id;
			twit_content += '<article>';

			twit_content += '<div id=twt_' + twit_id + ' class="twit_content">';
			twit_content += '<div id="alert_twt_' + twit_id + '"></div>'; 
			twit_content += '<span class="">' + twitter_feed[i].text + '</span>';
			twit_content += '<br>';
			twit_content += '<div class="twit_control">';
			twit_content += '<a href="#" onClick="hide_user_twit(' + twit_id + ');">hide</a>';
			twit_content += ' - ';
			twit_content += '<a href="#" onClick="unhide_twit(' + twit_id + ');">unhide</a>';
			twit_content += '</div>';
			twit_content += '</div><br>';
			twit_content += '</article>';
		}
		$('#twitter_feed_container').html(twit_content);
	}
}

function hide_twits(){
	url = "../twits/list/";
	hidden_twits = get_ajax_result(url);
	for(i = 0; i < hidden_twits.length; i++){
		hide_twit(hidden_twits[i].assigned_id);
	}
}

function show_hidden_twits(){
	url = "../twits/list/";
	hidden_twits = get_ajax_result(url);
	for(i = 0; i < hidden_twits.length; i++){
		hide_user_twit(hidden_twits[i].assigned_id);
	}
}

function hide_user_twit(twit_id){
	var container_html = $("#twt_" + twit_id).html();
	$("#twt_" + twit_id).css("background-color", "#C0C0C0");
	$("#alert_twt_" + twit_id).html("- hidden twit -");
	url = "../twits/hide/" + twit_id;
	twit_status = get_ajax_result(url);
}

function hide_twit(twit_id){
	var container_html = $("#twt_" + twit_id).html();
	$("#twt_" + twit_id).hide();
}

function unhide_twit(twit_id){
	var container_html = $("#twt_" + twit_id).html();
	$("#twt_" + twit_id).css("background-color", "#FFFFFF");
	$("#alert_twt_" + twit_id).html("");
	url = "../twits/unhide/" + twit_id;
	twit_status = get_ajax_result(url);
}

function get_ajax_result(url){
	result = [];
	$.ajax({
		url: url,
		type: 'get',
		dataType: 'html',
		async: false,
		success: function(data) {
			result = JSON.parse(data);
		} 
	});
	return result;
}

function show_twit_controls(){
	$(".twit_control").show();
}
