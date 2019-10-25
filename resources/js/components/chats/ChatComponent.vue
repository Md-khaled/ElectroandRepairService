<template>
<div class="panel-footer">
        <div class="input-group">
            <input id="btn-input" type="text" class="form-control input-sm chat_set_height" placeholder="Type your message here..." tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" contenteditable="true" />
            
            <span class="input-group-btn">
                <button class="btn bt_bg btn-sm" id="btn-chat">
                    Send</button>
            </span>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>