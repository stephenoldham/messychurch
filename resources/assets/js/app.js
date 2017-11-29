
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('editable', require('./components/EditableComponent.vue'));

const app = new Vue({
    el: '#app',

    data: {
    	query: '',
    	rows: [],
        ages: [
            '< 1',
            '1 - 2',
            '3 - 4',
            '5 - 7',
            '8 - 10',
            '11 - 13',
            '13 +'
        ]
    },

    mounted: function () {
        // Get icons
        axios.get('/presents')
            .then(response => {
                this.rows = response.data;

                // this.$nextTick(function () {
                //     this.updateScollPositions();
                // });
            })
            .catch(error => {
                console.log(error);
            });
    },

    computed: {
		visibleRows: function () {
			let term  = this.query.toLowerCase();

			return this.rows.filter(function(row) {
				var contains = _.filter(row, function(value) {
					var check = value + '';
					check = check.toLowerCase();

					return check.indexOf(term) !== -1;
				});

				return contains.length > 0;
			})
		},

        countBoys: function(){
            return this.countGender('boy')
        },

        countGirls: function(){
            return this.countGender('girl')
        },

        countUnisex: function(){
            return this.countGender('unisex')
        },
	},

    methods: {
        countGender: function(gender){
            return this.countByKey('gender', gender);
        },

        countAge: function(age){
            return this.countByKey('age', age);
        },

        countByKey: function(key, value){
            return this.rows.filter(function(row) {
                return row[key].toLowerCase() == value;
            }).length;
        }
    }
});