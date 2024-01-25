<template>
    <div>
      <button v-if="show" @click.prevent="unsave()" class="btn btn-dark" style="width: 100%">Unsave</button>
      <button v-else @click.prevent="save()" class="btn btn-primary" style="width: 100%">Save</button>
    </div>
  </template>

  <script>

  export default {
    props: ['jobid', 'favourited'],
    data() {
      return {
        show: true // Initialize show to false by default
      }
    },
    mounted() {
      this.show = this.jobFavourited ? true : false; // Set show based on jobFavourited
    },
    computed: {
      jobFavourited() {
        return this.favourited;
      }
    },
    methods: {
      save() {
        axios.post('/save/' + this.jobid)   
          .then(response => this.show = true)
          .catch(error => alert('Error saving'));
      },
      unsave() {
        axios.post('/unsave/' + this.jobid)
          .then(response => this.show = false)
          .catch(error => alert('Error unsaving'));
      }
    }
  }
  </script>
