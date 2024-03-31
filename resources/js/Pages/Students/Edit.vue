<template>
    <div>
      <h1>Edit Student</h1>
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
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import { usePage } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const { data: { student } } = usePage().props.value;
      const { put } = usePage();
      const form = ref({
        name: student.name,
        age: student.age,
        status: student.status,
      });
  
      const submitForm = async () => {
        try {
          await put(route('students.update', { student: student.id }), form.value);
          this.$inertia.visit(route('students.index'));
        } catch (error) {
          console.error('Error updating student:', error);
          // Optionally handle error, e.g., show error message
        }
      };
  
      return { form, submitForm };
    },
  };
  </script>
  