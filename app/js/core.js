$(function() {
	"use strict";
	
	/*
	=================================================
		Forms
	=================================================
	*/
	
	//remove default zero's from fields
	zerofy();
	
	
	
	
	/*
	=================================================
		Common User Interaction
	=================================================
	*/
	
	//show pop-up message if unsaved changes have been made
	/*$(window).bind('beforeunload', function(){ 
		setCheckout('unset');
		if($('body').data('alteration') === 1){
			return '';
		}
	});	*/
	
	//stop links for activating
	$('.noLink').click(function(e){
		e.preventDefault();
	});
	
	//standard common toggle
	$('.toggle').click(function(e){
		e.preventDefault();
		var box = $(this).data('toggle');
		var oldText = $(this).text();
		var newText = $(this).data('text');
		$('.'+box).toggle('slideDown');
		$(this).text(newText);
		$(this).data('text',oldText);
		console.log(newText,oldText);
	});
	
	//standard common video iFrame
	$('.youTubeVideo').click( function(e){
		var url = $(this).data('url');
		$(this).html('<iframe width="100%" src="'+url+'&autoplay=1"</iframe>');
		$(this).removeClass('youTubeVideo');
		$(this).addClass('youTubeVideoActive');
		return false;
	});
	$('.youTubeVideo').each( function(){
		$(this).append('<div class="playBtn"></div>');
	});
	
});

function zerofy(){
	$('.zerofy').each(function(i){
		if($(this).val()==0){
			$(this).val('');
		}else if($(this).val()==''){
			$(this).val(0);
		}
	});
}

function fillDetails(details, objectId) {
		"use strict";
		var key = '';
		for(key in details) {
			$('#'+ objectId +'_' + key).val(details[key]);
		}
	}
	
function fillLocation(locationId, objectId){
	"use strict";
	var baseUrl = $('#baseUrl').data('url');
	$.ajax({
		url: baseUrl+'/site/getParentLocation/'+locationId,
		type: 'POST',
		dataType: "json",
		success: function(data) {
			switch(data.old.type){
				case 'area':
					$('#'+objectId+'_area').val(data.old.name);
					$('#'+objectId+'_town').val('');
					$('#'+objectId+'_region').val('');
					break;
				case 'town':
					$('#'+objectId+'_town').val(data.old.name);
					$('#'+objectId+'_region').val('');

					break;
				case 'region':
					break;
			}
			switch(data.new.type){
				case 'area':
					$('#'+objectId+'_area').val(data.new.name);
					fillLocation(data.new.id, objectId);
					break;
				case 'town':
					$('#'+objectId+'_town').val(data.new.name);
					fillLocation(data.new.id, objectId);
					break;
				case 'region':
					$('#'+objectId+'_region').val(data.new.name);
					break;
			}
		}
	});	
}

function fillMultipleDetails(data, name, childName, boxName, modelName) {	
	var box = $('#'+boxName);
	var modelId = modelName.replace('[','_').replace(']','');
	var container = $('#'+modelId+'_'+name+'_autoComplete');	

	container.data(name,[]);						
	box.empty();
	data.split(',').forEach(function(value, index) {
		if (value != '') {
			index++;
			box.append("<div class='row'><label for='"+modelName+"["+name+"]["+index+"]\'>"+childName+" "+index+"</label><input type='text' name='"+modelName+"["+name+"]["+index+"]' value='"+value+"' id='"+modelId+"_"+name+"_"+index+"' /></div>");
			container.data(name).push(value);
		}
	});
}

function clearDetails(objectId) {
	"use strict";
	$('[id^='+objectId+'_]').val('');
}
