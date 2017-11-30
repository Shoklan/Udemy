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
- 


# Cmdlets

# Variables

# Conditional Logic

# Loops

# Objects & The Pipeline

# Powershell & WMI

# Modules: A Brief Overview

# Providers: A Brief Overview

# Active Directory

# Creating Your First Script
