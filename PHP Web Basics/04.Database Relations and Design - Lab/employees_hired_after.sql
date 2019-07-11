SELECT e.first_name, e.last_name, e.hire_date, d.name dept_name
FROM employees e
JOIN departments d on e.department_id = d.department_id
WHERE DATE(e.hire_date) > '1999-01-01'
AND (d.name = 'Sales' OR d.name = 'Finance')
ORDER BY hire_date ASC;