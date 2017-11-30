# Powershell: A Getting Started Guide for IT Admins
## Adam Bertram

# Course Introduction
- Expectations:
  1. We're going to be using mostly Powershell v2
  2. We're covering the core to make sure it works with all versions
  3. This class is from before 2013.
- We're going to have lots of hands on experience.
- Break and fix stuff yourself.

# Powershell Background
- Powershell can be used as a drop-in replacement for CMD.
- Based on .NET; written in .NET
- There are 4 versions.
- Powershell v1 was called monad.
- It started in 2005.
- Exchange software is built on top on Powershell.

# Installation/Configuration
- You can tell what version you're on using `$psversiontable.psversion`
- To get v3, you'd visit Microsoft's site and install **Windows Maangement Framework 3.0**
- Typing `get-help` is the main help system.
- To update the help system to the latest version use `update-help`
- You're also going to want to adjust the **Execution Policy**.
- This is Windows version of permissions.
- You can check what it is using `Get-ExectutionPolicy`.
- The default is *AllSigned*; meaning the script must have a cert.
- You can run a script in the present directory using `.\<script_name>.ps1`.
- Powershell also includes *tab completion*.
- To set the policy, use `Set-ExecutionPolicy unrestricted`.

# The Interactive Console
- Make sure to be running Powershell as *Administrator*.
- You can cycle through your old history using the *Up Arrow* and *Down Arrow*.
- If you hold down *CTRL* you can scroll left and right by words.
- The Powershell editor is called **ISE**.
- If you enter `$profile` then it will return the current profiles location.
- The profile is not there by default.
- Use `Set-Location` to move to that directory.
- You can create *aliases* using `Set-Alias <alias_name> 'command_alias_code'`.

# Cmdlets
- CMDlets are the replacement for batch files.
- There are two kinds of *aliases*:
  1. **User-Defined**
  2. **Default**
- The `Get-Command` cmdlet is the one that gives you the list of all commands.
- The standard naming nomenclature in Powershell is **Verb-Noun**.
- Powershell will try and limit your names if you try and break this expectation.
- You can get the list of acceptable verbs using `Get-Verb`.
- You can also use `Get-Command` to filter on type using parameters `-Verb Get`.
- You can get help with a specific cmdlet using `Get-Help <cmdlet-name>`.
- You can also get examples by passing `-Examples` to the above.
- You can see a list of all aliases using `Get-Alias`.
- You can list the current directory contents using `Get-ChildItem`.
- Microsoft included aliases for both *Windows* and *Linux*.
- To save an alias `Export-Alias -Path my_aliases.txt -Name j`.

# Variables
- All variables in Powershell have a **Data Type**.
- This is just to formulate how variables should be stored.
- Powershell is what is called a **Dynamically Typed** or **Losely Typed** language.
- Variables start with `$`.
- It follows the normal assignment structure as other languages.
- It is saved for the lifetime of the current console.
- You can cast to a different data type using `[string]`.
- You can get the type of an object using `x.GetType()`.
- To get rid of a variable you assign `$null` to it.
- There are a few different data types:
  1. bool
  2. string
  3. int
  4. array
  5. hashtable
- To check for equality use `-eq`; which is similar to linux.
- `[string]` is the most common type of data type you'll encounter.
- Single Quotes are treated as a string literal.
- Double Quotes allow for variable expansion inside of them.
- An **Array** Powershell is not contained to a single type.
- You declare it with `@(item1, item2, item3)`
- To push an item onto the array, you use `+=` insted of a method.
- The array elements can be accessed with their index; 0 indexing.
- **Hash Tables** are powershells version of dictionaries.
- You declare theem with `@{'key1' = item1; 'key2' = item2}`.
- You can return an element using `$ht.Get_Item('key1')` to get `item1`.
- Or, you could use `$ht.key1` for the same effect.
- You can add items using `$ht.add('key3', item3)`.
- To replace a value, use `$ht.Set_Item('key1', item6)`.
- You can remove an item using `$ht.Remove(key2)`.

# Conditional Logic
- The most common way to evaluate conditions is the `if/then/else/elseif` clauses.
```
$x = 5
if ( $x -eq 1){
  Write-Host 'x is equal to 1'
} elseif( $x -eq 2){
  Write-Host 'x is equal to 2'
} else{
  Write-Host 'x is not equal to 1'
}
```
- You can use `if($var)` to check if a variable exists.
- A **Switch Statement** looks like:
```
$a = 5

switch($a){
  1 {'option 1'}
  2 {'option 2'}
  default {'option default'}
}
```
- Code could go inside the brackets; not just strings
- You can also pass wildcards and regex using parameter `-wildcard` and catch with `'d*'`.

# Loops
- 


# Objects & The Pipeline

# Powershell & WMI

# Modules: A Brief Overview

# Providers: A Brief Overview

# Active Directory

# Creating Your First Script
