<template>
	<div id="modal" v-bind:class="{show:modalOpen}">
        <button v-on:click="modalOpen = false" class="modal-close">&times;</button>
        <div class="modal-content">
        	<slot></slot>
        </div>
    </div>
</template>
<script>
	export default {
		data(){
			return {
				modalOpen: false
			}
		},
		methods: {
			
		},
		watch: {
			modalOpen: function(){
				var className = 'modal-open';
				if(this.modalOpen){
					document.body.classList.add(className);
				}
				else{
					document.body.classList.remove(className);
				}
			}
		},
		created(){
			
		},
		destroyed(){
			
		}
	}
</script>
<style>
	#modal{
		  display: none;
		  position: fixed;
		  top:0;
		  bottom:0;
		  right:0;
		  left:0;
		  z-index: 2000;
		  background: rgba(0,0,0,0.85);
		}
		#modal.show{
		  display: block;
		}
		.modal-content{
		  height:100%;
		  max-width:105vh;
		  padding-top:12vh;
		  margin:0 auto;
		  position: relative;
		}
		.modal-content img{
		  max-width:100%;
		}
		.modal-close{
		  position: absolute;
		  right:0;
		  top:0;
		  padding:0px 28px 8px;
		  font-size:4em;
		  width:auto;
		  height:auto;
		  background:transparent;
		  border:0;
		  color:#fff;
		  outline: none;
		  z-index: 1000;
		  font-weight: 100;
		  line-height: 1;
		}
</style>