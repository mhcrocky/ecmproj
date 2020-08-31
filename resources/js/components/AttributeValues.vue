<template>
	<div>
		<div class="tile">
			<h3 class="tile-title">Attribute Values </h3>
			<hr>
			<div class="title-body">
				<div class="form-group">
					<label for="value" class="control-label">Value</label>
					<input type="text" class="form-control" placeholder="Enter attribute value" name="value" v-model="value">
				</div>

				<div class="form-group">
					<label for="price" class="control-label">Price</label>
					<input type="text" class="form-control" name="price" placeholder="Enter attribue value price" v-model="price">
				</div>
			</div>
			<div class="title-footer">
				<div class="row d-print-none mt-2">
					<div class="col-12 text-right">
						<button class="btn btn-success" type="submit" @click="saveValue()" v-if="addValue">
							<i class="fa fa-fw fa-lg fa-check-circle"></i> Save
						</button>
						<button class="btn btn-success" type="submit" @click="updateValue()" v-if="!addValue">
							<i class="fa fa-fw fa-lg fa-check-circle"></i> Update
						</button>
						<button class="btn btn-primary" type="submit" @click="reset()" v-if="!addValue">
							<i class="fa fa-fw fa-lg fa-check-circle"></i> Reset
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="tile">
			<h3 class="tile-title">Option Values</h3>
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-sm">
						<thead>
							<tr class="text-center">
								<th>#</th>
								<th>Value</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="value in values">
								<td class="text-center"> {{ value.id }} </td>
								<td class="text-center"> {{ value.value }} </td>
								<td class="text-center"> {{ value.price }} </td>
								<td class="text-center">
									<button class="btn btn-sm btn-primary" @click="editAttributeValue(value)"><i class="fa fa-edit"></i></button>
									<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	props: ['attributeid'],
	data(){
		return {
			values: [],
			addValue: true,
			value: '',
			price: '',
		}
	},
	created: function(){
		this.loadValues();
	},
	methods: {
		loadValues(){
			let attributeId = this.attributeid;
			let _this = this;
			axios.post('/admin/attributes/get-values', {
				id: attributeId
			}).then(function(res){
				_this.values = res.data;
			}).catch(function(error){
				console.log(error);
			});
		},
		saveValue(){
			if(this.value === ''){
				this.$swal("Error, Value for attribute is required", {
					icon: "error",
				});
			}else {
				let attributeId  = this.attributeid;
				let _this = this;
				axios.post('/admin/attributes/add-values', {
					id: attributeId,
					value: _this.value,
					price: _this.price,
				}).then(function(res){
					_this.values.push(res.data);
					_this.resetValue();
					_this.$swal("Success! Value added successfully!", {
						icon: 'success',
					});
				}).catch(function(error){
					console.log(error);
				})
			}
		},
		resetValue(){
			this.value = '';
			this.price = '';

		},
	}
}
</script>