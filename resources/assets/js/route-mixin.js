import axios from 'axios';

function getData(to){
	return new Promise((resolve) => {
		let serverData = JSON.parse(window.vuebnb_server_data)  || {};
		if(!serverData.path || to.path !== serverData.path){
			axios.get(to.path).then(({data})=>{
				resolve(data);
			});
		}else{
			resolve(serverData);
		}
	});
};
export default {
	//problem child
	beforeRouteEnter: (to, from , next) => {
		getData(to).then((data)=>{
			next(component=>component.assignData(data));
		});
	}
};