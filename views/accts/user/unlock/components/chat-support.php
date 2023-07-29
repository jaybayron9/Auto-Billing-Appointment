<div data-dial-init class="fixed right-6 bottom-6 group z-40 w-96">
    <div id="chat" class="hidden py-1 mb-4 bg-gray-50 border border-gray-300 rounded-lg shadow-lg overflow-y-auto max-h-[400px]">
        <div id="chatDisplay" class="bg-gray-50 p-5 mb-4 h-96"></div>
        <form id="sm-form" class="sticky bottom-0 flex gap-x-3 mx-2 border-t-2 border-gray-300 pt-4">
            <div class="w-full pb-2">
                <textarea id="message" name="message" cols="2" rows="1" placeholder="Aa" class="w-full h-10 overflow-y-hidden border border-gray-400 shadow rounded-md px-3 focus:outline-none resize-none"></textarea>
            </div>
            <div class="">
                <button type="submit" class="text-blue-600 hover:bg-gray-300 hover:text-sky-500 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <button type="button" data-dial-toggle="chat" aria-controls="chat" aria-expanded="false" class="flex items-center justify-center ml-auto text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z" />
            <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z" />
        </svg>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>

<script type="text/javascript">
    var chatbox = $('#chat');
    var textarea = $("#message");
    textarea.on("input", function() {
        textarea.css("height", "auto");
        var scrollHeight = textarea.prop("scrollHeight");
        var minHeight = 10;
        var newHeight = Math.max(scrollHeight, minHeight);  
        textarea.css("height", newHeight + "px"); 
        chatbox.scrollTop(chatbox[0].scrollHeight); 
    });
    chatbox.scrollTop(chatbox[0].scrollHeight);  
</script>