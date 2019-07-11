SELECT
            e.employee_id,
            e.job_title,
            e.address_id,
            a.address_text
FROM
            employees e
INNER JOIN
            addresses a
ON
            e.address_id = a.address_id
ORDER BY
            address_id ASC
LIMIT 
            5;