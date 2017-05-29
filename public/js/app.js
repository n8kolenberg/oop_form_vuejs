class Errors {
    /* Create a new Errors instance */
    constructor() {
         this.errors = {};
    }

    /* Retrieve the error message for a field */
    get(field) {
        if(this.errors[field]) {
            return this.errors[field][0];
        }
    }

    /* Record the new errors */
    record(errors) {
        this.errors = errors;
    }

    /* Determine if any errors exist for a given field*/
    has(field) {
        //if this.errors contains a 'field' property
        return this.errors.hasOwnProperty(field);
    }

    /* Determine if we have any errors*/
    any() {
        //If the errors object has 1 or more keys, then the form should have errors
        return Object.keys(this.errors).length > 0;
    }

    /* Clear one or all error fields */
    clear(field) {
        if(field) delete this.errors[field];
    }
}

class Form {
    /* Create a new Form instance */
    constructor(data) {
        this.originalData = data;
        /* By doing the following, we can just use this.name or this.description
         instead of this.form.name*/
        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    } //End constructor

    /* Fetch all the relevant data for the form*/
    data() {
        let data = {};
        for (let property in this.originalData) {
            data[property] = this[property];
        }
        return data;
    }

    /* Reset the fields of the form */
    reset() {
        for (let field in this.originalData) {
            this[field] = "";
        }
        this.errors.clear();
    }

    //Send a post request to a given url
    post(url) {
        return this.submit('post', url);
    }

    //Send a get request to a given url
    get(url) {
        return this.submit('get', url);
    }

    //Send a patch request to a given url
    patch(url) {
        return this.submit('patch', url);
    }

    //Send a delete request to a given url
    delete(url) {
        return this.submit('delete', url);
    }

    //Submit the form
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    /* Within my Vue instance, by using the following line, I can now use
                      .then() in the submit call */
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    /* Within my Vue instance, by using the following line, I can now use
                     .catch() in the submit call */
                    reject(error.response.data);
                });
        });


    }

    onSuccess(data) {
        // TEMPORARY
        console.log(data);
        alert(data.message);
        // Reset the form after submitting
        this.reset();
    }

    onFail(errors) {
        // console.log(this.$data);
        this.errors.record(errors);
    }

    }


const app = new Vue({
    el: '#root',

    data: {
        form: new Form({
           name: "",
           description: ""
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/suggestions')
                .then(data => console.log(`Handling it! Your request: ${data.message}`))
                .catch(error => console.log(error));
        }


    },

});