# Microsoft Windows Server 2012 Certification
##

# Key Windows Server 2012R2 Principles

# Deplyting Windows Server 2012

# Manage Windows Server 2012

# Internet Protocol v4

# Dynamic hoist Configuration Protocol

# Domain Name Services

# Internet Protocol v6

# File and Print Services

# Active Directory Deplymoent and Management
- Windows Computers are default in a WORKGROUP.
- It has it's own security SAM file.
- When a device is logging into a domain, it still retains its local SAM file.
- But, when using resources it is using the SAM of the AD server.
- This was limiting though and it 2000, Microsoft introduced **Active Directory**.
- Due to LDAP implementation, anything that is an LDAP client can use and query the AD Server.
- The name of the Active Directory databse is *ntds.dit* and can be found usually in ../System32
- **Global Catalog Servers** are most useful when you have multiple domains.
- It is there to assist with searches by storing common attributes of every object in all of the domains.
- There are 5 Partitions to any one Domain:
  1. Configuration.
  2. Schema: Blueprint of the Active Directory.
  3. The Domain Itself.
  4. Forest DNS Zone.
  5. Domain DNS Zone.
- A **Domain** is really just a grouping of objects.
- It contains:
  * Computers
  * Users
  * Groups
  * Organizational units.
- In the past, you could manually define relationships between different Domains.
- When you create a new domain and specify a parent, then it will become part of that domain's tree.
- When this happens, the parent's name **must** show up in the child's name.
- Trust is transitive between the parent and the child.
- This means that all domains in a Tree have an implicit transitive trust relationship will all other nodes in the tree.
- A **Forest** is what allows us to have different namespaces but the trust relationship can be transitive at the root nodes of the trees.
- At the domain level, you can raise the **Domain Functional Level**.
- This will limit what the lowest level in the ADs is allowed to be.
- This is also possible at the Forest Level.
-



# Using Group Policy

# Hyper-V

# Summary

# Research:

# Reference:
