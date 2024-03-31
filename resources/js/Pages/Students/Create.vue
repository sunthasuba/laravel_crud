<template>
    <div>
      <h1>Create Student</h1>
      <form @submit.prevent="submitForm">
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="form.name" required />
        </div>
        <div>
          <label for="age">Age:</label>
          <input type="number" id="age" v-model="form.age" required />
        </div>
        <div>
          <label for="status">Status:</label>
          <select id="status" v-model="form.status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <button type="submit">Create</button>
      </form>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { usePage } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const { post } = usePage();
      const form = ref({
        name: '',
        age: null,
        status: 'active',
      });
  
      const submitForm = async () => {
        try {
          await post(route('students.store'), form.value);
          this.$inertia.visit(route('students.index'));
        } catch (error) {
          console.error('Error creating student:', error);
          // Optionally handle error, e.g., show error message
        }
      };
  
      return { form, submitForm };
    },
  };
  </script>
  