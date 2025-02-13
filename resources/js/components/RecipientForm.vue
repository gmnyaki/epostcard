<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Create New Recipient</h1>
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Form Section -->
      <div class="flex-1">
        <form @submit.prevent="submitForm" class="space-y-6">
          <div class="form-group">
            <label for="name" class="block text-sm font-medium text-gray-700">Recipient Name</label>
            <input
              type="text"
              v-model="form.name"
              id="name"
              class="form-control"
              :class="{ 'is-invalid': errors.name }"
              @blur="validateField('name')"
              required
            >
            <div v-if="errors.name" class="invalid-feedback">
              {{ errors.name }}
            </div>
          </div>

          <div class="form-group">
            <label for="street1" class="block text-sm font-medium text-gray-700">Street 1</label>
            <input
              type="text"
              v-model="form.street1"
              id="street1"
              class="form-control"
              :class="{ 'is-invalid': errors.street1 }"
              @blur="validateField('street1')"
              required
            >
            <div v-if="errors.street1" class="invalid-feedback">
              {{ errors.street1 }}
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-group">
              <label for="street2" class="block text-sm font-medium text-gray-700">Street 2</label>
              <input
                type="text"
                v-model="form.street2"
                id="street2"
                class="form-control"
                :class="{ 'is-invalid': errors.street2 }"
                @blur="validateField('street2')"
              >
              <div v-if="errors.street2" class="invalid-feedback">
                {{ errors.street2 }}
              </div>
            </div>

            <div class="form-group">
              <label for="city" class="block text-sm font-medium text-gray-700">City</label>
              <input
                type="text"
                v-model="form.city"
                id="city"
                class="form-control"
                :class="{ 'is-invalid': errors.city }"
                @blur="validateField('city')"
                required
              >
              <div v-if="errors.city" class="invalid-feedback">
                {{ errors.city }}
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="form-group">
              <label for="state" class="block text-sm font-medium text-gray-700">State</label>
              <input
                type="text"
                v-model="form.state"
                id="state"
                class="form-control"
                :class="{ 'is-invalid': errors.state }"
                @blur="validateField('state')"
                required
              >
              <div v-if="errors.state" class="invalid-feedback">
                {{ errors.state }}
              </div>
            </div>

            <div class="form-group">
              <label for="zipcode" class="block text-sm font-medium text-gray-700">Zip Code</label>
              <input
                type="text"
                v-model="form.zipcode"
                id="zipcode"
                class="form-control"
                :class="{ 'is-invalid': errors.zipcode }"
                @blur="validateField('zipcode')"
                required
              >
              <div v-if="errors.zipcode" class="invalid-feedback">
                {{ errors.zipcode }}
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea
              v-model="form.message"
              id="message"
              class="form-control w-full min-h-[150px]"
              :class="{ 'is-invalid': errors.message }"
              @blur="validateField('message')"
              required
            ></textarea>
            <div v-if="errors.message" class="invalid-feedback">
              {{ errors.message }}
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            Submit
          </button>
        </form>
      </div>

      <!-- Preview Section -->
      <div class="flex-1">
        <div class="preview p-4 border border-gray-300 rounded-lg">
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
      Object.keys(this.form).forEach(field => this.validateField(field));

      
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
.container {
  max-width: 1200px;
}

.form-control {
  width: 100%;
  padding: 0.5rem;
  margin-top: 0.25rem;
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  transition: border-color 0.2s ease-in-out;
}

.form-control:focus {
  outline: none;
  border-color: #6366f1;
  ring: 2px #6366f1;
}

.is-invalid {
  border-color: #dc3545;
}

.invalid-feedback {
  color: #dc3545;
  font-size: 0.875rem;
  margin-top: 0.25rem;
}

.preview {
  background-color: #f9fafb;
  border-radius: 0.5rem;
}

.preview-content {
  font-family: Arial, sans-serif;
  color: #374151;
}
</style>