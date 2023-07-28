<template>
    <div class="shadow p-2">
        <h3>{{ title }}</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ab corrupti asperiores unde doloremque cum
            inventore officiis similique cumque pariatur. Corporis aspernatur vitae ullam incidunt animi error voluptate
            recusandae architecto.</p>

        <input v-model="msg"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <p>{{ msg }}</p>
    </div>
</template>


<script>
export default {
    data() {
        return {
            msg: ""
        }
    },
    props: [
        'title'
    ]
}
</script>
