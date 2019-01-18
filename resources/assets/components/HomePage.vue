<template>
	<div>
		<div v-for="(group, country) in listing_groups">
			<h1>Place in {{ country }}</h1>
			<div>
				Listing here
			</div>
		</div>
	</div>
</template>
<script>
	import { groupByCountry } from '../js/helpers';
	let serverData = JSON.parse(window.vuebnb_server_data);
	let listing_groups = groupByCountry(serverData.listings);

	export default{
		data(){
			return { listing_groups }
		}
	}

</script>