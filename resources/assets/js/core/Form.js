import Errors from './Errors';

class Form {

    constructor (data) {
        this.originalData = data;
        this.processing = false;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    post(url) {
        return this.submit('post', url);
    }

    put(url) {
        return this.submit('put', url);
    }

    patch(url) {
        return this.submit('patch', url);
    }

    delete(url) {
        return this.submit('delete', url);
    }

    submit(requestType, url) {
        this.processing = true;

        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                    this.processing = false;
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    reject(error.response.data);
                    this.processing = false;
                });
        });
    }

    isProcessing() {
        return this.processing;
    }

    onSuccess(data) {
        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

export default Form;