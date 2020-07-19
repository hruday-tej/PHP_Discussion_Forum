<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_handleSignup.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="signupEmail">Email address</label>
                        <input type="email" id="signupEmail"  class="form-control" name="signupEmail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="signpassword">Password</label>
                        <input type="password" name="signupPassword" class="form-control" id="signupPassword" placeholder="Password">
                    </div>      
                    <div class="form-group">
                        <label for="signupcPassword">Confirm Password</label>
                        <input type="password" name="signupcPassword" class="form-control" id="signupcPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>