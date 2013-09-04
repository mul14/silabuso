function scrollTit(){
	$titleText   = $("#title-page").html();

	if ($titleText != null) {

		$fakeTop = $("#container").prepend('<div class="title-page title-top unvisible" id="fakeTop">' + $titleText + '</	div>');
		

		$(this).scroll(function(){
			$title_page = $("#title-page");
			// console.log($title_page[0].offsetParent.offsetTop);
			$scrollTop 	 = $(document).scrollTop();
			$titleOffset = $title_page.offset().top;

			if ($scrollTop>=$titleOffset) {
				$("#fakeTop").removeClass("unvisible");
				$title_page.removeClass("visible");

				$("#fakeTop").addClass("visible");
				$title_page.addClass("unvisible");


			}else{
				$("#fakeTop").removeClass("visible");
				$("#fakeTop").addClass("unvisible");

				$title_page.removeClass("unvisible");
				$title_page.addClass("visible");
			}
		});
	}
};

function scrollMen(){
	$titleText   = $("#edit-menubar").html();

	if ($titleText != null) {

		$fakeTop = $("#container").prepend('<div class="edit-menubar menu-top unvisible" id="fakeTop-menu">' + $titleText + '</	div>');
		
		$("#ed-namjur-btn").click(function(){
        	$("#ed-namjur-modal").dialog("open");	
        });

        $(".tam-matkul-btn").click(function(){
        	console.log("open dialog");
        	$("#tam-matkul-modal").dialog("open");
        });


		$(this).scroll(function(){
			$title_page = $("#edit-menubar");
			// console.log($title_page[0].offsetParent.offsetTop);
			$scrollTop 	 = $(document).scrollTop();
			$titleOffset = $("#title-page").offset().top;

			if ($scrollTop>=$titleOffset) {
				$("#fakeTop-menu").removeClass("unvisible");
				$title_page.removeClass("visible");

				$("#fakeTop-menu").addClass("visible");
				$title_page.addClass("unvisible");


			}else{
				$("#fakeTop-menu").removeClass("visible");
				$("#fakeTop-menu").addClass("unvisible");

				$title_page.removeClass("unvisible");
				$title_page.addClass("visible");
			}
		});
	}
};

