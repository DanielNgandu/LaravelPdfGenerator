#!/bin/sh
set -e

vendor/bin/phpunit

(git push) || true

git checkout production
git merge master

git push origin production

git checkout master



#This script is simpler. We’re running tests, pushing changes (if we have not pushed yet; it’s assumed we’re on master),
# switching to production, merging changes from master and pushing production. Then we switch back to master.
