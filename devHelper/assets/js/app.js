const http = axios;
const viewModel = new Vue({
	el: "#app",
	data: {
		utils: [],
		newUtil: {},
		categories: [],
		utilTitle: "",
		newUtilType: "",
		newUtilContent: "",
		newUtilDescription: "",
		feedBack: ""
	},

	methods: {
		async getUtils(idType, descriptionType) {
				
			this.utilTitle = descriptionType;
			const url = '/endpoint/util/get';
			const query = `?category=${idType}`;
			const requestUrl = url+query;
				
			await http.get(requestUrl)
				.then((response) => {
					this.utils = response.data;
				});
				
		},

		/**
		*Adiciona um novo utilitário
		*@return {undefined}
		*/
		async addNewUtil() {
			this.feedBack = new String();
			let emptyValues = this.hasEmptyValues(
				this.newUtilContent, this.newUtilDescription, 
				this.newUtilDescription
			);

			if (emptyValues.length !== 0) {
				this.feedBack = {'msg': 'Todos os campos devem ser preenchidos'};
				return;
			}

			await http.post('/endpoint/util/add', {
				content: this.newUtilContent,
				description: this.newUtilDescription,
				category: this.newUtilType
			})
			.then( (response) => {
				this.feedBack = response.data;
			})
			return;
		},

		hasEmptyValues() {
			const emptyFields = Array.prototype.filter.call(arguments, field => {
				return field.toString().length == 0;
			});
			return emptyFields;
		}
	},

	computed: {
		hasUtils() {
			return this.utils.length !== 0;
		}
	},

	mounted(){
		if (localStorage.getItem('categories')) {
				return;
		}

		const requestUrl = '/endpoint/util/category/all';
		http.get(requestUrl)
			.then((response) => {
				this.categories = response.data;
			 });
	}

});

