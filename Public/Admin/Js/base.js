$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);

	//侧栏列表
	var sided=$(".submenu a");
    sided.click(function(){
        $(".submenu a").removeClass("pc");
        $(this).addClass("pc");
    });

    // 动态调整iframe的高度以适应不同高度的显示器
    $('.panel-body,.panel').height($(window).height()-70);
    $('.panel-body').css('padding-bottom',50);

    // 左侧菜单自动适应高度
    $('.sidebar-offcanvas .accordion').height($(window).height()-70);
    $('.sidebar-offcanvas .accordion').css('overflow-y','auto');
});