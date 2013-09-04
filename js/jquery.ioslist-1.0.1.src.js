(function($){
	var defaults = {
		groupContainer: "dl",
		groupHeader: "dt",
		stationaryHeaderClass: "fakeHeader",
		stationaryHeaderElement: "h2",
	};	
	var elements = [];
	methods = {
		renew: function(){
			var $listWrapper,
				$fakeHeader,
				$listContainer,
				options = $.extend(defaults,options);

			elements = [];
			
			$listContainer = $(this);
			$listWrapper = $(this).parent();

			$fakeHeader = $listWrapper.find(options.stationaryHeaderElement).eq(0);	


			//reset menjadi 0 agar tampilan paling atas dari semester paling awal
			$listContainer.scrollTop(0);

			$listContainer.find(options.groupContainer).each(function (index,elem) {
				var $tmp_list = $listContainer.find(options.groupContainer).eq(index),
					$tmp_header = $tmp_list.find(options.groupHeader).eq(0),
					$tmp_listHeight = $tmp_list.height(),
					$tmp_listOffset = $tmp_list.position().top;
				elements.push({"list" : $tmp_list,
							"header" : $tmp_header,
							"listHeight" : $tmp_listHeight,
							"headerText" : $tmp_header.text(),
							"headerHeight" : $tmp_header.outerHeight(),
							"listOffset" : $tmp_listOffset,
							"listBottom" : $tmp_listHeight + $tmp_listOffset});
			});


			$fakeHeader.text(elements[0].headerText);


		}

	};
	_methods = {
		init: function(options){
			var $listWrapper,
				$fakeHeader,
				$listContainer,
				options = $.extend(defaults,options),
				isIOS = navigator.userAgent.match(/ipad|iphone|ipod/gi) ? true : false;

			if($(".listWrapper").length == 0) {
				$(this).wrap("<div class='listWrapper' data-ios='" + isIOS + "'></div>");
			}

			
			$listContainer = $(this);
			$listWrapper = $(this).parent();

			if ($("h2.fakeHeader").length == 0) {
				$listWrapper.prepend("<" + options.stationaryHeaderElement + "/>");	
				$fakeHeader = $listWrapper.find(options.stationaryHeaderElement).eq(0);
				$fakeHeader.addClass(options.stationaryHeaderClass);
			}else{
				
				$fakeHeader = $listWrapper.find(options.stationaryHeaderElement).eq(0);
			}
		

			$listContainer.find(options.groupContainer).each(function (index,elem) {
				var $tmp_list = $listContainer.find(options.groupContainer).eq(index),
					$tmp_header = $tmp_list.find(options.groupHeader).eq(0),
					$tmp_listHeight = $tmp_list.height(),
					$tmp_listOffset = $tmp_list.position().top;
				elements.push({"list" : $tmp_list,
							"header" : $tmp_header,
							"listHeight" : $tmp_listHeight,
							"headerText" : $tmp_header.text(),
							"headerHeight" : $tmp_header.outerHeight(),
							"listOffset" : $tmp_listOffset,
							"listBottom" : $tmp_listHeight + $tmp_listOffset});
			});



				$fakeHeader.text(elements[0].headerText);

				$listContainer.scroll(function() {
					
					testPosition();
				});
				
				function testPosition(){
					var currentTop = $listContainer.scrollTop(),
						topElement,
						offscreenElement,
						topElementBottom,
						i = 0;
						
					while((elements[i].listOffset - currentTop) <= 0) {
						topElement = elements[i];

						topElementBottom = topElement.listBottom - currentTop;
						if(topElementBottom < -topElement.headerHeight) {
							offscreenElement = topElement;
						}
						
						i++;
						if(i >= elements.length){
							break;
						}
					}


					
					if(topElementBottom < 0 && topElementBottom > -topElement.headerHeight) {
						$fakeHeader.addClass("hidden");
						$(topElement.list).addClass("animated");
					} else {
						$fakeHeader.removeClass("hidden");
						if(topElement){
							$(topElement.list).removeClass("animated");
						}
					}
					
					if(topElement){
						$fakeHeader.text(topElement.headerText);
					}
				}
		
		
		}
	};
	
	$.fn.ioslist = function(method){

		
		if(methods[method]){
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if ( typeof method === "object" || ! method ) {
			return $.each(this, function(){_methods.init.apply( this, arguments );});
	    } else {
			$.error( "Method " +  method + " does not exist on jquery.ioslist" );
	    }
		
		
	};
	
})(jQuery);