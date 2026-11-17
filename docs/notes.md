# Technical Notes

## Biggest Docker Problem and How I Solved It
When I ran `docker rm -f my-login-container`, I got this error:
"failed to connect to the docker API ... The system cannot find the file specified."

The reason was that I had not opened Docker Desktop. The docker commands only
talk to the Docker engine, and they do not start it by themselves.

To fix it, I opened Docker Desktop and waited until the engine was running.
Then I ran the command again and it worked.

## Most Important Git/GitHub Lesson
- **Push needs a commit:** When I ran `git push` before making any commit, I got
  the error "src refspec main does not match any". I learned that I must make
  at least one commit before pushing.
- **Git identity:** I learned that I must set `user.name` and `user.email`
  before my first commit.
- **.gitignore:** I learned that files like `tempCodeRunnerFile.php` should not
  be uploaded to the repository, so I added them to `.gitignore`.