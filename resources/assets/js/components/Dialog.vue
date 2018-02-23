<template>
<div>
    <div v-for="dialog in dialogs.data" class="box dialog-box">
        <article class="media has-text-right">
            <div class="media-left">
            </div>
            <div class="media-content has-text-right">
                <div class="content rtl" style="white-space:pre-line;">
                    <p id="">{{ dialog.text }}</p>
                </div>

                <nav class="level is-mobile dialog-info">
                    <div class="level-left">
                        <a class="level-item copy" alt="Copy to clipboard" title="متن کپی شد" data-clipboard-action="copy" data-clipboard-target="" data-tippy-title="کپی">
                            <span class="icon is-small has-text-info"><i class="fa fa-clipboard"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-large has-text-primary"><i class="fa fa-heart-o">+2</i></span>
                        </a>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <p class="has-text-grey-light is-size-7 rtl" style="margin-right:10px;">
                                <span>{{ dialog.created_at }}</span>
                                &nbsp;توسط
                                <a href="#" class="user-info">
                                    {{ dialog.id }}
                                    <img src="#" class="profile-image">
                                </a>
                            </p>
                            <span class="tag">
                                {{ dialog.title }}
                            </span>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="media-right">
                <figure class="image is-96x96 is-square">
                    <img v-bind:src="dialog.poster" style="border-radius:50%;">
                </figure>
            </div>
        </article>
    </div>
</div>
</template>

<script>
    export default {
        props: {
          dialogs: {
            type: Object,
            required: true,
          }
        },
        data() {
          return {

          }
        },
        mounted() {
          console.log(this.dialogs);
        }
    }
</script>