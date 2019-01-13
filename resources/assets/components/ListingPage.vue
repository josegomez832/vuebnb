<template>
<div>
	<header-image
        :image-url="images[0]"
        @header-clicked="openModal"></header-image>
  <div class="container">
    <div class="heading">
        <h1>{{title}}</h1>
        <p>{{address}}</p>
    </div><!--/heading-->
    <hr/>
    <div class="about">
        <h3>About this listing</h3>
        <expandable-text>{{about}}</expandable-text>
    </div><!--/about-->
        <div class="lists">
            <feature-list title="Amenities" :items="amenities">
               <template slot-scope="amenity">
                    <i class="fa fa-lg" :class="amenity.icon"></i>
                    <span>{{amenity.title}}</span>
                </template><!--/list-item-->
            </feature-list>
            <feature-list title="Prices" :items="prices"> 
                <template slot-scope="price">
                    <strong>{{price.title}}:</strong> {{price.value}}
                </template><!--/list-item-->
            </feature-list>
        </div><!--/lists-->
    </div><!--/container-->
     <modal-window ref="imagemodal">
        <image-carousel :images="images"></image-carousel>
    </modal-window>
    <input v-on:keyup.enter="handler"/>
</div>
</template>
<script>
import { populateAmenitiesAndPrices } from '../js/helpers';
let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model);
import ImageCarousel from './ImageCarousel.vue';
import ModalWindow from './ModalWindow.vue';
import FeatureList from './FeatureList.vue';
import HeaderImage from './HeaderImage.vue';
import ExpandableText from './ExpandableText.vue';

export default{
	data(){
		return Object.assign(model, {
			title: model.title,
			address: model.address,
			about: model.about,		
			amenities: model.amenities,
			prices: model.prices,
		});
	},
	components:{
		//from import function line 4
		ImageCarousel,
		ModalWindow,
		FeatureList,
		HeaderImage,
		ExpandableText
	},
	methods: {
		openModal() {
			this.$refs.imagemodal.modalOpen = true;
		},
	}
}
</script>
<style>
.heading{
  margin-bottom:2em;
}
.heading h1{
  font-size:32px;
  font-weight:700;
}
.heading p{
  font-size:15px;
  color:#767676;
}

@media (min-width: 744px) {
  .container {
    width: 696px;
  }
}
</style>