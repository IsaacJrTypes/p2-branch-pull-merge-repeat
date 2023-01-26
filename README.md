# P2-branch-pull-merge-repeat

IT262 Project 2

## Git Commands
Make sure git is installed by using git status. If terminal does not understand the command, then install git 


Windows, Using VSCode
- Navigation using powershell:
	- Using VSCode, press **CTRL + `** to open powershell terminal in **current directory**
	- In terminal, place git command
- Navigation using mouse:
	- In VSCode, right-click on desired directory file > Open in Integrated Terminal  



|Action|Git Command  | Notes |
|--|--|--|
|  Git Status|`git status`  |Lets you know if git has been initialized on file, branch info... etc.|
|Git Clone| `git clone <github-link>`| Clones project from github to local drive|
|Check all branches|`git branch -a`|Display all local and remote branches
|Create branch|`git branch <branch-name>`|Will create a local branch with name|
|Switch to branch|`git checkout <branch-name>`| Will switch to branch|
|Check branch location|`git status`|Use this command often! Can help track changes to files and branch location|
|Stage all file for commit| `git add .`| Will stage all modified files, ready for commit|
|Commit files|`git commit -m "Added new file"`|Commits staged files with message|
|Push local branch commits to remote branch|`git push -u <remote> <branch name>`|Use `origin` to push your local branch commits to our main github remote|
|Update local files to remote|`git pull`|If you have any unsaved changes, make sure you deal with them before pulling|
|Get all remote branches|`git fetch origin`|Don't see other's branch, use this command|
|Merge Branches| `git merge <file-name>`| **From your branch**, merge main [^1]|


[^1]:  Workflow should be: 
	 1. Pull
	 2. Checkout your branch w/ commits
	 3. Merge main 
	 4. Push branch to origin.   
     5. Initiate **pull request on github**
	- Doing it this way will reduce merge conflicts

