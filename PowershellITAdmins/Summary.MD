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
- 



# Conditional Logic

# Loops

# Objects & The Pipeline

# Powershell & WMI

# Modules: A Brief Overview

# Providers: A Brief Overview

# Active Directory

# Creating Your First Script
