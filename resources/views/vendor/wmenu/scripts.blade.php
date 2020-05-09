<script>
	var menus = {
		"oneThemeLocationNoMenus" : "",
		"moveUp" : "Naar boven",
		"moveDown" : "Naar beneden",
		"moveToTop" : "Bovenaan",
		"moveUnder" : "Verplaats onder %s",
		"moveOutFrom" : "Van onder  %s",
		"under" : "Onder %s",
		"outFrom" : "Onder van %s",
		"menuFocus" : "%1$s. Element menu %2$d of %3$d.",
		"subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
	};
	let addcustommenur= '{{ route("haddcustommenu") }}';
	let updateitemr= '{{ route("hupdateitem")}}';
	let generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
	let deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
	let csrftoken="{{ csrf_token() }}";
	let menuwr = "{{ url()->current() }}";

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': csrftoken
		}
	});
</script>
<script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/menu.js')}}"></script>
