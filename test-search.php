<?php require_once( 'couch/cms.php' ); ?>

<form id="k_search_form" method="get" action="" accept-charset="utf-8">
    <p>
    	<cms:input type="text" class="typeahead" name="s" id="s" value="Train Name&hellip;" onfocus="if (document.forms['k_search_form'].s.value === 'Train Name&hellip;') document.forms['k_search_form'].s.value=''" onblur="if (document.forms['k_search_form'].s.value == '') document.forms['k_search_form'].s.value='Train Name&hellip;'" />
	    <input type="submit" class="search_button" value="Search" /></p>
	    <input type="hidden" name="nc" value="1" />
</form>
<hr>

<table class="gxcpl-table" border="1" id="userTbl">
	<thead>
		<tr>
			<th width="10%">
				Sr.No
			</th>
			<th width="25%;">
				Train Name
			</th>
			<th width="*">
				Loco No.
			</th>
		</tr>
	</thead>
	<tbody>
		
		<cms:pages masterpage="pointwise-interchange.php" limit="10" custom_field="is_interchanged='1' | to_ho=0 | interchange=ET | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> " show_future_entries='1'>
		
		<tr>
			<td width="10%">
				<cms:show k_absolute_count />
			</td>
			
			<td width="25%;">

				<cms:show tr_name />(<cms:date arrival_date format='Y-m-d' />::<cms:show interchange />::<cms:show to_ho />)
			</td>
			
			<td width="*">
				<cms:show loco />
			</td>
		</tr>
		
		</cms:pages>

	</tbody>
</table>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/bloodhound.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/typeahead.jquery.min.js"></script>
<script type="text/javascript">
	// init Bloodhound
	var countries_suggestions = new Bloodhound({
	    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	    queryTokenizer: Bloodhound.tokenizers.whitespace,
	    prefetch: {
	        url:'<cms:show k_site_link />test-search-train-name.php',
	        transform: function (data) {          // we modify the prefetch response
	            var newData = [];                 // here to match the response format 
	            data.forEach(function (item) {    // of the remote endpoint
	                newData.push({'name': item});
	            });
	            return newData;
	        }
	    },
	    remote: {
	        url: 'https://restcountries.eu/rest/v2/alpha?codes=%QUERY',
	        wildcard: '%QUERY'
	    },
	    identify: function (response) {
	        return response.name;
	    }
	});

// init Typeahead
	$('#s').typeahead(
	{
	    minLength: 0,
	    highlight: true
	},
	{
	    name: 'countries',
	    source: suggestionsWithDefaults,   // custom function is passed as the source
	    display: function(item) {          // display: 'name' will also work
	        return item.name;
	    },
	    limit: 5,
	    templates: {
	        suggestion: function(item) {
	            return '<div>'+ item.name +'</div>';
	        }
	    }
	});

	function suggestionsWithDefaults(q, sync, async) {
	    if (q === '') {
	        sync([
	        	{name:'NBOX'}, 
	        	{name:'GCC'}
	        ]);
	    } else {
	        // let bloodhound handle the rest
	        countries_suggestions.search(q, sync, async); 
	    }
	}
</script>
<script>
	$(document).ready(function(){
	    $('.typeahead').on('keyup',function(){
	        var searchTerm = $(this).val().toLowerCase();
	        $('#userTbl tbody tr').each(function(){
	            var lineStr = $(this).text().toLowerCase();
	            if(lineStr.indexOf(searchTerm) === -1){
	                $(this).hide();
	            }else{
	                $(this).show();
	            }
	        });
	    });
	});
</script>

<?php COUCH::invoke(); ?>