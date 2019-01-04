<div class="modal" id="newsletterModalContent">
    <div class="modal-content">
        <h2 class="headline-centered p-t-0">{ Sign up for the Tweetsnippet newsletter }</h2>
        <p>We will send you selected snippets right to your inbox every week, your email is safe with us and will never be given to 3rd party!</p>
        <form action="{{ route('newsletter.signup') }}">
            <label class="p-b-1">What kind of snippets do you want?</label>
            <div class="grid p-0 p-b-1">
                @foreach($tags as $tag)
                    <div class="custom-checkbox">
                        <input type="checkbox" id="checkbox-{{ $tag->id }}" name="tags" value="{{ $tag->id }}">
                        <label for="checkbox-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="peter@example.com">
            </div>

            <button type="submit" class="button m-t-2">Sign me up</button>
        </form>
    </div>
</div>