// Get countries for select
var countries = [];
var url = "https://restcountries.eu/rest/v2/";
$.getJSON(url, function(val) {
	for (var i = 0; i < val.length; i++) {
		countries.push(val[i].name);
	}
});

Vue.use(VeeValidate);

// Create new Vue Instance
new Vue({
	el: "#multistep",
	data: () => ({
		step: 1,
		details: {
			fname: null,
			lname: null,
			country: null,
			countries: countries,
			dob: null,
			modal: false,
			picker: null
		},
		attributes: {
			height: 170,
			weight: 80,
			strength: 5,
			speed: 5,
			endurance: 5
		},
		health: {
			heartrate: 100,
			activity: 9,
			sleep: 9,
			smoker: null
		},
		email: null,
		submitted: false,
		message: null
	}),
	methods: {
		prev() {
			this.step--;
			this.submitted = false;
		},
		next() {
			if (
				this.details.fname === null ||
				this.details.lname === null ||
				this.errors.items.length > 0
			) {
				return false;
			} else {
				this.step++;
				this.submitted = false;
			}
		},
		validateBeforeSubmit() {
			this.$validator.validateAll().then(result => {
				if (result) {
					this.message = "Submission completed.";
					this.submitted = true;
					return;
				}
			});
		}
	}
});