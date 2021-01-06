<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <font size="5"><strong>Why Us</strong></font>
                <hr>
                <hr class="without-border-20px">
                <span>Reliable Post</span><hr class="without-border-10px">
                <span>Copyright claim</span><hr class="without-border-10px">
                <span>Quality Images</span><hr class="without-border-10px">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <font size="5"><strong>Your Shot</strong></font>
                <hr>
                <hr class="without-border-20px">
                <span>About Your Shot</span><hr class="without-border-10px">
                <span>Community Rules</span><hr class="without-border-10px">
                <span>Photo Guidelines</span><hr class="without-border-10px">
                <span>Copyright info</span><hr class="without-border-10px">
                <span>Terms of use</span><hr class="without-border-10px">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <font size="5"><strong>Feedback</strong></font>
                <hr>
                <hr class="without-border-20px">
                <form method="POST" action="/user/feedback">
                    @csrf
                    <input type="email" class="feedback-input  @error('email') is-invalid @enderror" required placeholder="Enter your email..." name="email"><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <hr class="without-border-10px">
                    <textarea class="feedback-input @error('feedback') is-invalid @enderror" placeholder="Enter your feedback..." required name="feedback"></textarea>
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <span style="color:red">{{ $message }}</span><br>
                        </span>
                    @enderror
                    <hr class="without-border-10px">
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <font size="5"><strong>Contacts</strong></font>
                <hr>
                <hr class="without-border-20px">
                <a href=""><font class="myicon" color="#d44638" size="5px"><span class="fa fa-envelope"></span></font></a>
                <a href=""><font class="myicon" color="#38A1F3" size="5px"><span class="fa fa-twitter-square"></span></font></a>
                <a href=""><font class="myicon" color="#3c5a99" size="5px"><span class="fa fa-facebook-official"></span></font></a>
                <a href=""><font class="myicon" color="#c13584" size="5px"><span class="fa fa-instagram"></span></font></a>
                <a href=""><font class="myicon" color="#0077B5" size="5px"><span class="fa fa-linkedin"></span></font></a>
                <hr>
                <a href=""><font color="#fff" size="3px"><span class="fa fa-copyright"> Photolancer | 2019</span></font></a>
            </div>
        </div>
    </div>
</footer>