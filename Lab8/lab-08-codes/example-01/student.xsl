<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/class">

        <html>
            <body>
                <h2>Student List</h2>

                <table border="1">
                    <tr bgcolor="tomato">
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Laat Name</th>
                    </tr>

                    <xsl:for-each select="student">

                        <tr>
                            <td>
                                <xsl:value-of select="id" />
                            </td>
                            <td>
                                <xsl:value-of select="firstname" />
                            </td>
                            <td>
                                <xsl:value-of select="lastname" />
                            </td>

                        </tr>

                    </xsl:for-each>

                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>