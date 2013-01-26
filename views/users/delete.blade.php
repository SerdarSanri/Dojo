<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Warning!</h3>
                      </div>
                      <div class="modal-body">
                        <p>Do you really wish delete this user?</p>
                        
                      </div>
                      <div class="modal-footer">
                        
                         <a href="delete.php?ref={{$user->id}}" class="btn danger">Yes</a>
                        <button class="btn" data-dismiss="modal" aria-hidden="true" id="cancel">No</button>
                      </div>
                    </div>