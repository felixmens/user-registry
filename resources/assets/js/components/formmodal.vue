<template>

        <formmodal></formmodal>
</template>
<script>
import lists from './Lists.vue'
export default {
  props: ['id'],
    data(){
        return{
                user: {
                    id: '',
                    firstname: '',
                    surname: '',
                    email: '',
                    position: ''
                }
        }  
    },
    mounted(){
      axios('api/user/'+ this.id)
        .then(res => res.json())
        .then(data => {
            this.firstname = user.firstname;
            this.surname  = user.surname;
            this.email = user.email;
            this.position = user.position;
        })
        .catch(err => console.log(err));
    }
    //
}
</script>
