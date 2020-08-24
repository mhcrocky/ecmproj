<template>
	<h3>Option Values </h3>
</template>
<script>
export default{
	name: "attribute-values",
	props: ['attributedid'],
	data(){
		return {
			values: [],
			value: '',
			price: '',
			currentId: '',
			addValue: true,
			key: 0,
		}
	},
	created: function(){
		this.loadValues();
	},
	methods: {
		loadValues(){
			let attributedid = $this.attributedid;
			let _this = this;
			axios.post('admin/attributes/get-values', {
				id: attributesId
			}).then(function(response)){
				_this.values = response.data;
			}.catch(function(error)){
				console.log(error);
			}

		}
	}
}
</script>