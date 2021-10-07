# Terrazza Component Monorepo

### how to get repository within all submodules
```
git clone --recurse-submodules -j8 git://github.com/foo/bar.git
```
### how to remove a submodule
delete submodule from cache
```
git rm --cached path_to_submodule
```
remove the submodule's .git directory:
```
rm -rf .git/modules/path_to_submodule
```
commit the changes
```
git commit -m "Removed submodule <name>"
```
delete the now untracked submodule files
```
rm -rf path_to_submodule
```

### how to update current repository with the latest tag versions
```
git submodule foreach --recursive 'git fetch --tags'
git submodule update --recursive
git add .
git commit -m "update submodule references"
git push
```