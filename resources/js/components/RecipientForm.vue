<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Create New Recipient</h1>
    <form @submit.prevent="submitForm" class="space-y-6">
      <!-- Recipient Name -->
      <div class="form-group">
        <label for="name" class="block text-sm font-medium text-gray-700">Recipient Name</label>
        <input
          type="text"
          v-model="form.name"
          id="name"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.name }"
          @blur="validateField('name')"
          required
        >
        <div v-if="errors.name" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.name }}
        </div>
      </div>

      <!-- Street 1 -->
      <div class="form-group">
        <label for="street1" class="block text-sm font-medium text-gray-700">Street 1</label>
        <input
          type="text"
          v-model="form.street1"
          id="street1"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.street1 }"
          @blur="validateField('street1')"
          required
        >
        <div v-if="errors.street1" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.street1 }}
        </div>
      </div>

      <!-- Street 2 -->
      <div class="form-group">
        <label for="street2" class="block text-sm font-medium text-gray-700">Street 2</label>
        <input
          type="text"
          v-model="form.street2"
          id="street2"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.street2 }"
          @blur="validateField('street2')"
        >
        <div v-if="errors.street2" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.street2 }}
        </div>
      </div>

      <!-- City -->
      <div class="form-group">
        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
        <input
          type="text"
          v-model="form.city"
          id="city"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.city }"
          @blur="validateField('city')"
          required
        >
        <div v-if="errors.city" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.city }}
        </div>
      </div>

      <!-- State -->
      <div class="form-group">
        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
        <input
          type="text"
          v-model="form.state"
          id="state"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.state }"
          @blur="validateField('state')"
          required
        >
        <div v-if="errors.state" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.state }}
        </div>
      </div>

      <!-- Zip Code -->
      <div class="form-group">
        <label for="zipcode" class="block text-sm font-medium text-gray-700">Zip Code</label>
        <input
          type="text"
          v-model="form.zipcode"
          id="zipcode"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.zipcode }"
          @blur="validateField('zipcode')"
          required
        >
        <div v-if="errors.zipcode" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.zipcode }}
        </div>
      </div>

      <!-- Message -->
      <div class="form-group">
        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
        <textarea
          v-model="form.message"
          id="message"
          class="form-control w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
          :class="{ 'is-invalid': errors.message }"
          @blur="validateField('message')"
          required
        ></textarea>
        <div v-if="errors.message" class="invalid-feedback text-sm text-red-500 mt-1">
          {{ errors.message }}
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
        Submit
      </button>
    </form>

    <!-- Preview Section -->
    <div class="preview mt-8 p-4 border border-gray-300 rounded-lg">
      <h2 class="text-xl font-bold mb-4">Preview</h2>
      <div class="preview-content">
        <p><strong>Recipient Name:</strong> {{ form.name }}</p>
        <p><strong>Street 1:</strong> {{ form.street1 }}</p>
        <p><strong>Street 2:</strong> {{ form.street2 }}</p>
        <p><strong>City:</strong> {{ form.city }}</p>
        <p><strong>State:</strong> {{ form.state }}</p>
        <p><strong>Zip Code:</strong> {{ form.zipcode }}</p>
        <p><strong>Message:</strong> {{ form.message }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        name: '',
        street1: '',
        street2: '',
        city: '',
        state: '',
        zipcode: '',
        message: ''
      },
      errors: {
        name: '',
        street1: '',
        street2: '',
        city: '',
        state: '',
        zipcode: '',
        message: ''
      }
    };
  },
  methods: {
    validateField(field) {
      if (!this.form[field]) {
        this.errors[field] = `${this.getFieldLabel(field)} is required.`;
      } else {
        this.errors[field] = '';
      }
    },
    getFieldLabel(field) {
      const labels = {
        name: 'Recipient Name',
        street1: 'Street 1',
        street2: 'Street 2',
        city: 'City',
        state: 'State',
        zipcode: 'Zip Code',
        message: 'Message'
      };
      return labels[field];
    },
    async submitForm() {
      // Validate all fields before submitting
      Object.keys(this.form).forEach(field => this.validateField(field));

      // Check if there are any errors
      if (Object.values(this.errors).some(error => error !== '')) {
        alert('Please fix the errors before submitting.');
        return;
      }

      try {
        const response = await axios.post('/api/recipients', this.form);
        alert('Recipient created successfully!');
        this.resetForm();
      } catch (error) {
        alert('Failed to create recipient.');
      }
    },
    resetForm() {
      this.form = {
        name: '',
        street1: '',
        street2: '',
        city: '',
        state: '',
        zipcode: '',
        message: ''
      };
      this.errors = {
        name: '',
        street1: '',
        street2: '',
        city: '',
        state: '',
        zipcode: '',
        message: ''
      };
    }
  }
};
</script>

<style scoped>
.is-invalid {
  border-color: #dc3545;
}
.invalid-feedback {
  color: #dc3545;
  font-size: 0.875em;
}
.preview {
  background-color: #f9fafb;
}
.preview-content {
  font-family: Arial, sans-serif;
}
</style>
